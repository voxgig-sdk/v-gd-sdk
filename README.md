# VGd SDK

Shorten long URLs into compact v.gd links via a no-auth HTTP API

> TypeScript, Python, PHP, Golang, Ruby, Lua SDKs, a CLI, an interactive REPL, and an MCP server for AI agents — all generated from one OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

## About V.gd API

[v.gd](https://v.gd) is a URL shortener that turns long links into short `v.gd/...` redirects. It is run by the same operators as is.gd and positions itself as "the ethical URL shortener" — no interstitials, no tracking beyond optional opt-in click stats. The site reports having shortened over 90 million URLs serving more than 3 billion redirects.

What you get from the API:

- Create a short link from any long URL
- Optionally request a custom short slug (5–30 alphanumeric characters plus underscores)
- Choose response format: `web` (HTML), `simple` (plain text), `xml`, or `json` (with optional JSONP callback)
- Optionally enable click-statistics logging on a per-link basis
- Look up the original long URL behind an existing short code

Operational notes: requests can be made via HTTPS `GET` or `POST` and no authentication is required. The service enforces per-IP rate limits and caps clients at 5 concurrent connections; enabling stats logging counts double against rate limits. Errors are returned with numeric codes (1 = bad source URL, 2 = bad custom slug, 3 = rate limited, 4 = other). Clients should cache shortened URLs and back off for roughly a minute after hitting a rate-limit error.

## Try it

**TypeScript**
```bash
npm install v-gd
```

**Python**
```bash
pip install v-gd-sdk
```

**PHP**
```bash
composer require voxgig/v-gd-sdk
```

**Golang**
```bash
go get github.com/voxgig-sdk/v-gd-sdk/go
```

**Ruby**
```bash
gem install v-gd-sdk
```

**Lua**
```bash
luarocks install v-gd-sdk
```

## 30-second quickstart

### TypeScript

```ts
import { VGdSDK } from 'v-gd'

const client = new VGdSDK({})

```

See the [TypeScript README](ts/README.md) for the
full guide, or scroll down for the same example in other languages.

## What's in the box

| Surface | Use it for | Path |
| --- | --- | --- |
| **SDK** (TypeScript, Python, PHP, Golang, Ruby, Lua) | App integration | `ts/` `py/` `php/` `go/` `rb/` `lua/` |
| **CLI** | Scripts, CI, ops, one-off API calls | `go-cli/` |
| **MCP server** | AI agents (Claude, Cursor, Cline) | `go-mcp/` |

## Use it from an AI agent (MCP)

The generated MCP server exposes every operation in this SDK as an
[MCP](https://modelcontextprotocol.io) tool that Claude, Cursor or Cline
can call directly. Build and register it:

```bash
cd go-mcp && go build -o v-gd-mcp .
```

Then add it to your agent's MCP config (Claude Desktop, Cursor, etc.):

```json
{
  "mcpServers": {
    "v-gd": {
      "command": "/abs/path/to/v-gd-mcp"
    }
  }
}
```

## Entities

The API exposes one entity:

| Entity | Description | API path |
| --- | --- | --- |
| **UrlShortening** | Creating short `v.gd/...` codes for long URLs and resolving them back to their originals, via `create.php` (shorten) and the lookup endpoint documented on v.gd. | `/create.php` |

Each entity supports the following operations where available: **load**,
**list**, **create**, **update**, and **remove**.

## Quickstart in other languages

### Python

```python
from vgd_sdk import VGdSDK

client = VGdSDK({})


# Load a specific urlshortening
urlshortening, err = client.UrlShortening(None).load(
    {"id": "example_id"}, None
)
```

### PHP

```php
<?php
require_once 'vgd_sdk.php';

$client = new VGdSDK([]);


// Load a specific urlshortening
[$urlshortening, $err] = $client->UrlShortening(null)->load(
    ["id" => "example_id"], null
);
```

### Golang

```go
import sdk "github.com/voxgig-sdk/v-gd-sdk/go"

client := sdk.NewVGdSDK(map[string]any{})

```

### Ruby

```ruby
require_relative "VGd_sdk"

client = VGdSDK.new({})


# Load a specific urlshortening
urlshortening, err = client.UrlShortening(nil).load(
  { "id" => "example_id" }, nil
)
```

### Lua

```lua
local sdk = require("v-gd_sdk")

local client = sdk.new({})


-- Load a specific urlshortening
local urlshortening, err = client:UrlShortening(nil):load(
  { id = "example_id" }, nil
)
```

## Unit testing in offline mode

Every SDK ships a test mode that swaps the HTTP transport for an
in-memory mock, so unit tests run offline.

### TypeScript

```ts
const client = VGdSDK.test()
const result = await client.UrlShortening().load({ id: 'test01' })
// result.ok === true, result.data contains mock data
```

### Python

```python
client = VGdSDK.test(None, None)
result, err = client.UrlShortening(None).load(
    {"id": "test01"}, None
)
```

### PHP

```php
$client = VGdSDK::test(null, null);
[$result, $err] = $client->UrlShortening(null)->load(
    ["id" => "test01"], null
);
```

### Golang

```go
client := sdk.TestSDK(nil, nil)
result, err := client.UrlShortening(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
```

### Ruby

```ruby
client = VGdSDK.test(nil, nil)
result, err = client.UrlShortening(nil).load(
  { "id" => "test01" }, nil
)
```

### Lua

```lua
local client = sdk.test(nil, nil)
local result, err = client:UrlShortening(nil):load(
  { id = "test01" }, nil
)
```

## How it works

Every SDK call runs the same five-stage pipeline:

1. **Point** — resolve the API endpoint from the operation definition.
2. **Spec** — build the HTTP specification (URL, method, headers, body).
3. **Request** — send the HTTP request.
4. **Response** — receive and parse the response.
5. **Result** — extract the result data for the caller.

A feature hook fires at each stage (e.g. `PrePoint`, `PreSpec`,
`PreRequest`), so features can inspect or modify the pipeline without
forking the SDK.

### Features

| Feature | Purpose |
| --- | --- |
| **TestFeature** | In-memory mock transport for testing without a live server |

Pass custom features via the `extend` option at construction time.

### Direct and Prepare

For endpoints the entity model doesn't cover, use the low-level methods:

- **`direct(fetchargs)`** — build and send an HTTP request in one step.
- **`prepare(fetchargs)`** — build the request without sending it.

Both accept a map with `path`, `method`, `params`, `query`,
`headers`, and `body`. See the [How-to guides](#how-to-guides) below.

## How-to guides

### Make a direct API call

When the entity interface does not cover an endpoint, use `direct`:

**TypeScript:**
```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})
console.log(result.data)
```

**Python:**
```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
```

**PHP:**
```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
```

**Go:**
```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
```

**Ruby:**
```ruby
result, err = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})
```

**Lua:**
```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
```

## Per-language documentation

- [TypeScript](ts/README.md)
- [Python](py/README.md)
- [PHP](php/README.md)
- [Golang](go/README.md)
- [Ruby](rb/README.md)
- [Lua](lua/README.md)

## Using the V.gd API

- Upstream: [https://v.gd](https://v.gd)
- API docs: [https://v.gd/developers.php](https://v.gd/developers.php)

- Free to use without an API key or account
- Subject to the [v.gd Terms & Conditions](https://v.gd/terms.php) and [Spam Policy](https://v.gd/spam.php)
- Per-IP rate limiting applies; abusive usage may be blocked
- Third-party client libraries (Python, Node.js, .NET, Go) listed on the developers page are not endorsed or tested by v.gd

---

Generated from the V.gd API OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

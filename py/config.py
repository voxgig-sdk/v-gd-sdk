# VGd SDK configuration


def make_config():
    return {
        "main": {
            "name": "VGd",
        },
        "feature": {
            "test": {
        "options": {
          "active": False,
        },
      },
        },
        "options": {
            "base": "https://v.gd",
            "headers": {
        "content-type": "application/json",
      },
            "entity": {
                "url_shortening": {},
            },
        },
        "entity": {
      "url_shortening": {
        "fields": [
          {
            "name": "shorturl",
            "req": False,
            "type": "`$STRING`",
            "active": True,
            "index$": 0,
          },
          {
            "name": "status",
            "req": False,
            "type": "`$STRING`",
            "active": True,
            "index$": 1,
          },
        ],
        "name": "url_shortening",
        "op": {
          "load": {
            "name": "load",
            "points": [
              {
                "args": {
                  "query": [
                    {
                      "example": "json",
                      "kind": "query",
                      "name": "format",
                      "orig": "format",
                      "reqd": False,
                      "type": "`$STRING`",
                      "active": True,
                    },
                    {
                      "example": 0,
                      "kind": "query",
                      "name": "logstat",
                      "orig": "logstat",
                      "reqd": False,
                      "type": "`$INTEGER`",
                      "active": True,
                    },
                    {
                      "kind": "query",
                      "name": "shorturl",
                      "orig": "shorturl",
                      "reqd": False,
                      "type": "`$STRING`",
                      "active": True,
                    },
                    {
                      "example": "https://www.example.com/very/long/url/path",
                      "kind": "query",
                      "name": "url",
                      "orig": "url",
                      "reqd": True,
                      "type": "`$STRING`",
                      "active": True,
                    },
                  ],
                },
                "method": "GET",
                "orig": "/create.php",
                "parts": [
                  "create.php",
                ],
                "select": {
                  "exist": [
                    "format",
                    "logstat",
                    "shorturl",
                    "url",
                  ],
                },
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "active": True,
                "index$": 0,
              },
            ],
            "input": "data",
            "key$": "load",
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }

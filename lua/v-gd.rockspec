package = "voxgig-sdk-v-gd"
version = "0.0-1"
source = {
  url = "git://github.com/voxgig-sdk/v-gd-sdk.git"
}
description = {
  summary = "VGd SDK for Lua",
  license = "MIT"
}
dependencies = {
  "lua >= 5.3",
  "dkjson >= 2.5",
  "dkjson >= 2.5",
}
build = {
  type = "builtin",
  modules = {
    ["v-gd_sdk"] = "v-gd_sdk.lua",
    ["config"] = "config.lua",
    ["features"] = "features.lua",
  }
}

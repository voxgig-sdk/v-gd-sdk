-- VGd SDK error

local VGdError = {}
VGdError.__index = VGdError


function VGdError.new(code, msg, ctx)
  local self = setmetatable({}, VGdError)
  self.is_sdk_error = true
  self.sdk = "VGd"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function VGdError:error()
  return self.msg
end


function VGdError:__tostring()
  return self.msg
end


return VGdError

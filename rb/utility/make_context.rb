# VGd SDK utility: make_context
require_relative '../core/context'
module VGdUtilities
  MakeContext = ->(ctxmap, basectx) {
    VGdContext.new(ctxmap, basectx)
  }
end

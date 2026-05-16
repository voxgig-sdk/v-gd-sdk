# VGd SDK utility: feature_add
module VGdUtilities
  FeatureAdd = ->(ctx, f) {
    ctx.client.features << f
  }
end

# VGd SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module VGdFeatures
  def self.make_feature(name)
    case name
    when "base"
      VGdBaseFeature.new
    when "test"
      VGdTestFeature.new
    else
      VGdBaseFeature.new
    end
  end
end

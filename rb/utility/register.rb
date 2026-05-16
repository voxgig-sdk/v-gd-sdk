# VGd SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

VGdUtility.registrar = ->(u) {
  u.clean = VGdUtilities::Clean
  u.done = VGdUtilities::Done
  u.make_error = VGdUtilities::MakeError
  u.feature_add = VGdUtilities::FeatureAdd
  u.feature_hook = VGdUtilities::FeatureHook
  u.feature_init = VGdUtilities::FeatureInit
  u.fetcher = VGdUtilities::Fetcher
  u.make_fetch_def = VGdUtilities::MakeFetchDef
  u.make_context = VGdUtilities::MakeContext
  u.make_options = VGdUtilities::MakeOptions
  u.make_request = VGdUtilities::MakeRequest
  u.make_response = VGdUtilities::MakeResponse
  u.make_result = VGdUtilities::MakeResult
  u.make_point = VGdUtilities::MakePoint
  u.make_spec = VGdUtilities::MakeSpec
  u.make_url = VGdUtilities::MakeUrl
  u.param = VGdUtilities::Param
  u.prepare_auth = VGdUtilities::PrepareAuth
  u.prepare_body = VGdUtilities::PrepareBody
  u.prepare_headers = VGdUtilities::PrepareHeaders
  u.prepare_method = VGdUtilities::PrepareMethod
  u.prepare_params = VGdUtilities::PrepareParams
  u.prepare_path = VGdUtilities::PreparePath
  u.prepare_query = VGdUtilities::PrepareQuery
  u.result_basic = VGdUtilities::ResultBasic
  u.result_body = VGdUtilities::ResultBody
  u.result_headers = VGdUtilities::ResultHeaders
  u.transform_request = VGdUtilities::TransformRequest
  u.transform_response = VGdUtilities::TransformResponse
}

<?php
declare(strict_types=1);

// VGd SDK utility registration

require_once __DIR__ . '/../core/UtilityType.php';
require_once __DIR__ . '/Clean.php';
require_once __DIR__ . '/Done.php';
require_once __DIR__ . '/MakeError.php';
require_once __DIR__ . '/FeatureAdd.php';
require_once __DIR__ . '/FeatureHook.php';
require_once __DIR__ . '/FeatureInit.php';
require_once __DIR__ . '/Fetcher.php';
require_once __DIR__ . '/MakeFetchDef.php';
require_once __DIR__ . '/MakeContext.php';
require_once __DIR__ . '/MakeOptions.php';
require_once __DIR__ . '/MakeRequest.php';
require_once __DIR__ . '/MakeResponse.php';
require_once __DIR__ . '/MakeResult.php';
require_once __DIR__ . '/MakePoint.php';
require_once __DIR__ . '/MakeSpec.php';
require_once __DIR__ . '/MakeUrl.php';
require_once __DIR__ . '/Param.php';
require_once __DIR__ . '/PrepareAuth.php';
require_once __DIR__ . '/PrepareBody.php';
require_once __DIR__ . '/PrepareHeaders.php';
require_once __DIR__ . '/PrepareMethod.php';
require_once __DIR__ . '/PrepareParams.php';
require_once __DIR__ . '/PreparePath.php';
require_once __DIR__ . '/PrepareQuery.php';
require_once __DIR__ . '/ResultBasic.php';
require_once __DIR__ . '/ResultBody.php';
require_once __DIR__ . '/ResultHeaders.php';
require_once __DIR__ . '/TransformRequest.php';
require_once __DIR__ . '/TransformResponse.php';

VGdUtility::setRegistrar(function (VGdUtility $u): void {
    $u->clean = [VGdClean::class, 'call'];
    $u->done = [VGdDone::class, 'call'];
    $u->make_error = [VGdMakeError::class, 'call'];
    $u->feature_add = [VGdFeatureAdd::class, 'call'];
    $u->feature_hook = [VGdFeatureHook::class, 'call'];
    $u->feature_init = [VGdFeatureInit::class, 'call'];
    $u->fetcher = [VGdFetcher::class, 'call'];
    $u->make_fetch_def = [VGdMakeFetchDef::class, 'call'];
    $u->make_context = [VGdMakeContext::class, 'call'];
    $u->make_options = [VGdMakeOptions::class, 'call'];
    $u->make_request = [VGdMakeRequest::class, 'call'];
    $u->make_response = [VGdMakeResponse::class, 'call'];
    $u->make_result = [VGdMakeResult::class, 'call'];
    $u->make_point = [VGdMakePoint::class, 'call'];
    $u->make_spec = [VGdMakeSpec::class, 'call'];
    $u->make_url = [VGdMakeUrl::class, 'call'];
    $u->param = [VGdParam::class, 'call'];
    $u->prepare_auth = [VGdPrepareAuth::class, 'call'];
    $u->prepare_body = [VGdPrepareBody::class, 'call'];
    $u->prepare_headers = [VGdPrepareHeaders::class, 'call'];
    $u->prepare_method = [VGdPrepareMethod::class, 'call'];
    $u->prepare_params = [VGdPrepareParams::class, 'call'];
    $u->prepare_path = [VGdPreparePath::class, 'call'];
    $u->prepare_query = [VGdPrepareQuery::class, 'call'];
    $u->result_basic = [VGdResultBasic::class, 'call'];
    $u->result_body = [VGdResultBody::class, 'call'];
    $u->result_headers = [VGdResultHeaders::class, 'call'];
    $u->transform_request = [VGdTransformRequest::class, 'call'];
    $u->transform_response = [VGdTransformResponse::class, 'call'];
});

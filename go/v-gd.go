package voxgigvgdsdk

import (
	"github.com/voxgig-sdk/v-gd-sdk/core"
	"github.com/voxgig-sdk/v-gd-sdk/entity"
	"github.com/voxgig-sdk/v-gd-sdk/feature"
	_ "github.com/voxgig-sdk/v-gd-sdk/utility"
)

// Type aliases preserve external API.
type VGdSDK = core.VGdSDK
type Context = core.Context
type Utility = core.Utility
type Feature = core.Feature
type Entity = core.Entity
type VGdEntity = core.VGdEntity
type FetcherFunc = core.FetcherFunc
type Spec = core.Spec
type Result = core.Result
type Response = core.Response
type Operation = core.Operation
type Control = core.Control
type VGdError = core.VGdError

// BaseFeature from feature package.
type BaseFeature = feature.BaseFeature

func init() {
	core.NewBaseFeatureFunc = func() core.Feature {
		return feature.NewBaseFeature()
	}
	core.NewTestFeatureFunc = func() core.Feature {
		return feature.NewTestFeature()
	}
	core.NewUrlShorteningEntityFunc = func(client *core.VGdSDK, entopts map[string]any) core.VGdEntity {
		return entity.NewUrlShorteningEntity(client, entopts)
	}
}

// Constructor re-exports.
var NewVGdSDK = core.NewVGdSDK
var TestSDK = core.TestSDK
var NewContext = core.NewContext
var NewSpec = core.NewSpec
var NewResult = core.NewResult
var NewResponse = core.NewResponse
var NewOperation = core.NewOperation
var MakeConfig = core.MakeConfig
var NewBaseFeature = feature.NewBaseFeature
var NewTestFeature = feature.NewTestFeature

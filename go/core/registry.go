package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewUrlShorteningEntityFunc func(client *VGdSDK, entopts map[string]any) VGdEntity


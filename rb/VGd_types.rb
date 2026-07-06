# frozen_string_literal: true

# Typed models for the VGd SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Member types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Ruby types are unenforced; these YARD
# annotations document the shapes. Do not edit by hand.

# UrlShortening entity data model.
#
# @!attribute [rw] shorturl
#   @return [String, nil]
#
# @!attribute [rw] status
#   @return [String, nil]
UrlShortening = Struct.new(
  :shorturl,
  :status,
  keyword_init: true
)

# Request payload for UrlShortening#load.
#
# @!attribute [rw] shorturl
#   @return [String, nil]
#
# @!attribute [rw] status
#   @return [String, nil]
UrlShorteningLoadMatch = Struct.new(
  :shorturl,
  :status,
  keyword_init: true
)


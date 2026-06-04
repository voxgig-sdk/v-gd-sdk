package core

func MakeConfig() map[string]any {
	return map[string]any{
		"main": map[string]any{
			"name": "VGd",
		},
		"feature": map[string]any{
			"test": map[string]any{
				"options": map[string]any{
					"active": false,
				},
			},
		},
		"options": map[string]any{
			"base": "https://v.gd",
			"headers": map[string]any{
				"content-type": "application/json",
			},
			"entity": map[string]any{
				"url_shortening": map[string]any{},
			},
		},
		"entity": map[string]any{
			"url_shortening": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "shorturl",
						"req": false,
						"type": "`$STRING`",
						"active": true,
						"index$": 0,
					},
					map[string]any{
						"name": "status",
						"req": false,
						"type": "`$STRING`",
						"active": true,
						"index$": 1,
					},
				},
				"name": "url_shortening",
				"op": map[string]any{
					"load": map[string]any{
						"name": "load",
						"points": []any{
							map[string]any{
								"args": map[string]any{
									"query": []any{
										map[string]any{
											"example": "json",
											"kind": "query",
											"name": "format",
											"orig": "format",
											"reqd": false,
											"type": "`$STRING`",
											"active": true,
										},
										map[string]any{
											"example": 0,
											"kind": "query",
											"name": "logstat",
											"orig": "logstat",
											"reqd": false,
											"type": "`$INTEGER`",
											"active": true,
										},
										map[string]any{
											"kind": "query",
											"name": "shorturl",
											"orig": "shorturl",
											"reqd": false,
											"type": "`$STRING`",
											"active": true,
										},
										map[string]any{
											"example": "https://www.example.com/very/long/url/path",
											"kind": "query",
											"name": "url",
											"orig": "url",
											"reqd": true,
											"type": "`$STRING`",
											"active": true,
										},
									},
								},
								"method": "GET",
								"orig": "/create.php",
								"parts": []any{
									"create.php",
								},
								"select": map[string]any{
									"exist": []any{
										"format",
										"logstat",
										"shorturl",
										"url",
									},
								},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"active": true,
								"index$": 0,
							},
						},
						"input": "data",
						"key$": "load",
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
		},
	}
}

func makeFeature(name string) Feature {
	switch name {
	case "test":
		if NewTestFeatureFunc != nil {
			return NewTestFeatureFunc()
		}
	default:
		if NewBaseFeatureFunc != nil {
			return NewBaseFeatureFunc()
		}
	}
	return nil
}

package core

type VGdError struct {
	IsVGdError bool
	Sdk              string
	Code             string
	Msg              string
	Ctx              *Context
	Result           any
	Spec             any
}

func NewVGdError(code string, msg string, ctx *Context) *VGdError {
	return &VGdError{
		IsVGdError: true,
		Sdk:              "VGd",
		Code:             code,
		Msg:              msg,
		Ctx:              ctx,
	}
}

func (e *VGdError) Error() string {
	return e.Msg
}

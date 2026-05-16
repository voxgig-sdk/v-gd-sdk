
import { Context } from './Context'


class VGdError extends Error {

  isVGdError = true

  sdk = 'VGd'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  VGdError
}


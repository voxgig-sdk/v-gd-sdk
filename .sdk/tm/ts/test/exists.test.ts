
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { VGdSDK } from '..'


describe('exists', async () => {

  test('test-mode', async () => {
    const testsdk = await VGdSDK.test()
    equal(null !== testsdk, true)
  })

})

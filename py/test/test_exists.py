# ProjectName SDK exists test

import pytest
from vgd_sdk import VGdSDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = VGdSDK.test(None, None)
        assert testsdk is not None

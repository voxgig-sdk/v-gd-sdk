# VGd SDK feature factory

from feature.base_feature import VGdBaseFeature
from feature.test_feature import VGdTestFeature


def _make_feature(name):
    features = {
        "base": lambda: VGdBaseFeature(),
        "test": lambda: VGdTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()

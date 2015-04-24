<?php

namespace spec\Nekland\PlacesApi\Api;

use Nekland\BaseApi\Http\AbstractHttpClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AutocompleteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nekland\PlacesApi\Api\Autocomplete');
        $this->shouldHaveType('Nekland\BaseApi\Api\AbstractApi');
    }

    function let(AbstractHttpClient $client)
    {
        $this->beConstructedWith($client);
    }

    function it_should_return_request_result(AbstractHttpClient $client)
    {
        $client->send(Argument::cetera())->willReturn('{
  "status": "OK",
  "predictions" : [
      {
         "description" : "Paris, France",
         "id" : "691b237b0322f28988f3ce03e321ff72a12167fd",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "ChIJD7fiBh9u5kcRYJSMaMOCCwQ",
         "reference" : "CjQlAAAA_KB6EEceSTfkteSSF6U0pvumHCoLUboRcDlAH05N1pZJLmOQbYmboEi0SwXBSoI2EhAhj249tFDCVh4R-PXZkPK8GhTBmp_6_lWljaf1joVs1SH2ttB_tw",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Paris"
            },
            {
               "offset" : 7,
               "value" : "France"
            }
         ],
         "types" : [ "locality", "political", "geocode" ]
      },
      {
         "description" : "Paris Avenue, Earlwood, New South Wales, Australia",
         "id" : "359a75f8beff14b1c94f3d42c2aabfac2afbabad",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "ChIJrU3KAHG6EmsR5Uwfrk7azrI",
         "reference" : "CkQ2AAAARbzLE-tsSQPgwv8JKBaVtbjY48kInQo9tny0k07FOYb3Z_z_yDTFhQB_Ehpu-IKhvj8Msdb1rJlX7xMr9kfOVRIQVuL4tOtx9L7U8pC0Zx5bLBoUTFbw9R2lTn_EuBayhDvugt8T0Oo",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Paris Avenue"
            },
            {
               "offset" : 14,
               "value" : "Earlwood"
            },
            {
               "offset" : 24,
               "value" : "New South Wales"
            },
            {
               "offset" : 41,
               "value" : "Australia"
            }
         ],
         "types" : [ "route", "geocode" ]
      },
      {
         "description" : "Paris Street, Carlton, New South Wales, Australia",
         "id" : "bee539812eeda477dad282bcc8310758fb31d64d",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "ChIJCfeffMi5EmsRp7ykjcnb3VY",
         "reference" : "CkQ1AAAAAERlxMXkaNPLDxUJFLm4xkzX_h8I49HvGPvmtZjlYSVWp9yUhQSwfsdveHV0yhzYki3nguTBTVX2NzmJDukq9RIQNcoFTuz642b4LIzmLgcr5RoUrZhuNqnFHegHsAjtoUUjmhy4_rA",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Paris Street"
            },
            {
               "offset" : 14,
               "value" : "Carlton"
            },
            {
               "offset" : 23,
               "value" : "New South Wales"
            },
            {
               "offset" : 40,
               "value" : "Australia"
            }
         ],
         "types" : [ "route", "geocode" ]
      }
  ]
}');
        $this->complete('Paris')->shouldContainsPlaceId('ChIJD7fiBh9u5kcRYJSMaMOCCwQ');
    }

    function it_shoud_return_empty_array_when_no_results(AbstractHttpClient $client)
    {
        $client->send(Argument::cetera())->willReturn('{"status": "ZERO_RESULTS"}');

        $this->complete('arfzegreggdfgdsfd')->shouldReturn([]);
    }

    function it_should_throw_exception_when_quota_is_out(AbstractHttpClient $client)
    {
        $client->send(Argument::cetera())->willReturn('{"status": "OVER_QUERY_LIMIT"}');

        $this->shouldThrow('Nekland\BaseApi\Exception\QuotaLimitException')->duringComplete('Paris');
    }

    function it_should_throw_exception_when_request_is_denied(AbstractHttpClient $client)
    {
        $client->send(Argument::cetera())->willReturn('{"status": "REQUEST_DENIED"}');

        $this->shouldThrow('Nekland\BaseApi\Exception\AuthenticationException')->duringComplete('Paris');
    }

    function it_should_throw_exception_when_request_is_invalid(AbstractHttpClient $client)
    {
        $client->send(Argument::cetera())->willReturn('{"status": "INVALID_REQUEST"}');

        $this->shouldThrow('\InvalidArgumentException')->duringComplete('Paris', ['someweird_param' => 'foobar']);
    }

    public function getMatchers()
    {
        return [
            'containsPlaceId' => function ($subject, $param) {
                return isset($subject[0]) && $subject[0]['place_id'] == $param;
            }
        ];
    }
}

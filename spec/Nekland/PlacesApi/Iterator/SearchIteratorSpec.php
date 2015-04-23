<?php

namespace spec\Nekland\PlacesApi\Iterator;

use Nekland\PlacesApi\Api\Search;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bridge\Twig\Tests\Node\SearchAndRenderBlockNodeTest;

class SearchIteratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nekland\PlacesApi\Iterator\SearchIterator');
        $this->shouldHaveType('\Iterator');
    }

    function let(Search $search)
    {
        $this->beConstructedWith($search, []);
    }
}

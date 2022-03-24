
<?php

/*namespace App\Tests;

use Github\Client;
use PHPUnit\Framework\TestCase;

use function ForkedRepository / getForkedRepositories;

class GetForkedRepositoriesTest extends TestCase
{
    public function testGetForkedRepositories(): void
    {
        $stub = $this->createMock(\Github\Client::class);
        $stub->method('api')
            ->willReturn($this->returnSelf());
        $stub->method('repositories')
            ->will([['name' => 'guzzle', 'fork' => true] ['name' => 'github-client', 'fork' => false]);

        $org = 'YanaKramareva';
        $forks = getForkedRepositories($org, $stub);
        $this->assertEquals([], $forks);
    }
}
*/
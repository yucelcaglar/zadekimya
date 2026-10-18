<?php

use App\Database\Seeds\CatalogSeeder;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class CatalogFeatureTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $seed = CatalogSeeder::class;
    protected $namespace = 'App';

    public function testHomePageShowsSeededCatalog(): void
    {
        $result = $this->get('/');

        $result->assertOK();
        $result->assertSee('Endüstriyel süreçleriniz için güvenilir çözüm.');
        $result->assertSee('Filtreler');
        $result->assertSee('Madeni Yağlar');
    }

    public function testSeededProductHasAPublicDetailPage(): void
    {
        $result = $this->get('/urun/disk-filtresi');

        $result->assertOK();
        $result->assertSee('Disk Filtresi');
        $result->assertSee('paslanmaz çelik');
    }
}

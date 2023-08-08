<?php


// use PHPUnit\Framework\TestCase;
use App\Models\Affiliate;
use App\Traits\CoordinateInputTrait;
use Tests\TestCase;

class CoordinateTest extends TestCase
{
    use CoordinateInputTrait;

    /** @test */
    public function can_read_affiliates_file(): void
    {
        $affiliate = new Affiliate();
        $affiliates = $affiliate->readFile();
        $this->assertNotNull($affiliates);
    }

    /** @test */
    public function accepts_good_entry(): void
    {
        $json = '{"latitude": "52.240382", "affiliate_id": 10, "name": "Maja Blevins", "longitude": "-6.972413"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNotNull($entry);
        $this->assertNotNull($entry->name);
        $this->assertNotNull($entry->distance);
        $this->assertNotNull($entry->name);
        $this->assertNotNull($entry->latLng);
    }

    /** @test */
    public function will_not_accept_entry_missing_latitude(): void
    {
        $json = '{"affiliate_id": 10, "name": "Maja Blevins", "longitude": "-6.972413"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNull($entry);
    }


    /** @test */
    public function will_not_accept_entry_missing_longitude(): void
    {
        $json = '{"latitude": "52.240382", "affiliate_id": 10, "name": "Maja Blevins"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNull($entry);
    }

    /** @test */
    public function will_not_accept_entry_missing_name(): void
    {
        $json = '{"latitude": "52.240382", "affiliate_id": 10,"longitude": "-6.972413"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNull($entry);
    }

    /** @test */
    public function will_not_accept_entry_missing_affiliate_id(): void
    {
        $json = '{"latitude": "52.240382", "name": "Maja Blevins", "longitude": "-6.972413"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNull($entry);
    }

    /** @test */
    public function will_not_accept_entry_bad_latitude(): void
    {
        $json = '{"latitude": "99.240382", "affiliate_id": 10, "name": "Maja Blevins", "longitude": "-6.972413"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNull($entry);
    }

    /** @test */
    public function will_not_accept_entry_bad_longitude(): void
    {
        $json = '{"latitude": "52.240382", "affiliate_id": 10, "name": "Maja Blevins", "longitude": "-206.972413"}';
        $affiliate = new Affiliate();
        $entry = json_decode($json);
        $entry = $affiliate->checkEntry($entry);
        $this->assertNull($entry);
    }
}

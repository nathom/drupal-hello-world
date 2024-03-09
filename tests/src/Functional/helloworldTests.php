<?php

namespace Drupal\Tests\helloworld\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests for the module.
 * @group helloworld
 */
class HelloworldTests extends BrowserTestBase {

  /**
   * Modules to install
   *
   * @var array
   */
  protected static $modules = array('helloworld');
  protected $defaultTheme = 'stark';

  // A simple user
  private $user;

  // Perform initial setup tasks that run before every test method.
  public function setUp(): void {
    parent::setUp();
    $this->user = $this->DrupalCreateUser(array(
      'administer site configuration',
      'generate hello world',
    ));
  }

  /**
   * Tests that the page can be reached.
   */
  public function testhelloworldPageExists() {
    // Login
    $this->drupalLogin($this->user);

    // Generator test:
    $this->drupalGet('helloworld/generate/4/20');
    $this->assertSession()->statusCodeEquals(200);
  }

  /**
   * Tests the config form.
   */
  public function testConfigForm() {
    // Login
    $this->drupalLogin($this->user);
  }

}

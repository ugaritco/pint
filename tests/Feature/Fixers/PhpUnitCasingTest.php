<?php

use function Heritage\Filesystem\join_paths;

it('fixes the code', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/fixers/phpunit_method_casing.php'),
        '--preset' => 'ugarit',
    ]);

    expect($statusCode)->toBe(1)
        ->and($output)
        ->toContain('  ⨯ '.join_paths('tests', 'Fixtures', 'fixers', 'phpunit_method_casing.php'))
        ->toContain(<<<'DIFF'
              -    public function testItConvertsToSnakeCase()
              +    public function test_it_converts_to_snake_case()
            DIFF);
});

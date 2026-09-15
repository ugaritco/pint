<?php

it('fixes the code', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/fixers/ugarit_phpdoc_separation.php'),
        '--preset' => 'ugarit',
    ]);

    expect($statusCode)->toBe(1)
        ->and($output)
        ->toContain('  ⨯')
        ->toContain(
            <<<'EOF'
   /**
    * @param  string  $foo
  - *
    * @param  string  $bar
    * @return string
    */
EOF,
        );
});

<?php

it('fixes the code', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/fixers/ugarit_phpdoc_alignment.php'),
        '--preset' => 'ugarit',
    ]);

    expect($statusCode)->toBe(1)
        ->and($output)
        ->toContain('  ⨯')
        ->toContain(
            <<<'EOF'
   /**
    * @param  string  $foo
  - * @param string  $bar
  - * @param  string $x
  + * @param  string  $bar
  + * @param  string  $x
    * @return string
    */
EOF,
        );
});

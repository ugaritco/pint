<?php

it('fixes the code', function () {
    [$statusCode, $output] = run('default', [
        'path' => base_path('tests/Fixtures/fixers/yoda_style.php'),
        '--preset' => 'ugarit',
    ]);

    expect($statusCode)->toBe(1)
        ->and($output)
        ->toContain('  ⨯')
        ->toContain('@@ -20,6 +20,6 @@')
        ->toContain(
            <<<'EOF'
              -if (null === $int) {
              +if ($int === null) {
                   //
               }
            EOF,
        );
});

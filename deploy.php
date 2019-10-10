<?php
/* Load dependencies */
require dirname(__FILE__) . './vendor/autoload.php';

# Load dotenv library
$dotenv = Dotenv\Dotenv::create(__DIR__, './.env');
$dotenv->load();

namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', env('APP_NAME'));

// Project repository
set('repository', env('DEP_REPO'));
set('branch', env('DEP_BRANCH'));
set('keep_releases', env('DEP_KEEP_RELEASES'));

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', envToArray('DEP_SHARED_FILES'));
set('shared_dirs', envToArray('DEP_SHARED_DIRS'));

// Writable dirs by web server
set('writable_dirs', envToArray('DEP_WRITABLE_DIRS'));

// Hosts
// inventory('hosts.yml');

// Composer stuff
set('composer_action', 'install');
set('composer_options', '{{composer_action}} --verbose --no-interaction --no-dev --optimize-autoloader --no-suggest');

// Tasks
desc('Deploy your awesome project');
task('deploy', [
  'deploy:info',
  'deploy:prepare',
  'deploy:lock',
  'deploy:release',
  'deploy:update_code',
  'deploy:shared',
  'deploy:writable',
  'deploy:vendors',
  'deploy:clear_paths',
  'deploy:symlink',
  'deploy:unlock',
  'cleanup',
  'success'
]);

task('test', function () {
  writeln('Hello world');
});
task('pwd', function () {
  $result = run('pwd');
  writeln("Current dir: $result");
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

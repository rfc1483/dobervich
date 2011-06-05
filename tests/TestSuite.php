<?php

use Symfony\Component\Finder\Finder;

class TestSuite extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new TestSuite();
        $finder = new Finder();

        echo "Searching for installed bundles...\n";
        $bundles = array();
        foreach( $finder->directories()->in('../src/')->name('Tests') as $dir) {
            $target = $dir->getPathName();
            $bundleName = basename(dirname($target));
            $name = __DIR__ . "/{$bundleName}";
            $bundles[] = $bundleName;

            if( !file_exists($name) ) {
                echo "Adding bundle symlink: {$target}\n";
                symlink($target, $name);
            }
        }

        echo "\nPurging broken symlinks...\n";
        $finder = new Finder();
        foreach( $bundles as $bundle ) {
            /* will list only broken symlinks */
            $symlinks = $finder->files()->in(__DIR__)->name('*Bundle');
            foreach( $symlinks as $symlink ) {
                if( !in_array($symlink->getFilename(), $bundles) ) {
                    echo "Removing broken bundle symlink: {$symlink->getFilename()}\n";
                    @unlink($symlink->getPathName());
                }
            }
        }

        // ---------- COMMENT OUT TO TEST A SPECIFIC FILE ----------
        // $suite->addTestFile('../src/<yourbundle>/DefaultBundle/Tests/Controller/SomeControllerTest.php');
        // return $suite;
        // ----------

        $finder = new Finder();
        echo "\nSearching for test cases...\n";
        foreach ($finder->files()->in('../src/')->name('*Test.php') as $file) {
            if ( preg_match('%/Tests/[\w-/]+Test.php%i', $file->getPathName()) ) {
                echo 'Adding test : ' . $file->getPathName() . "\n";
                $suite->addTestFile($file->getPathName());
            }
        }
        echo "\n";

        return $suite;
    }
}
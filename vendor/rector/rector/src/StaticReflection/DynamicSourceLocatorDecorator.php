<?php

declare (strict_types=1);
namespace Rector\Core\StaticReflection;

use Rector\Core\FileSystem\FileAndDirectoryFilter;
use Rector\Core\FileSystem\FilesystemTweaker;
use Rector\Core\FileSystem\PhpFilesFinder;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider;
/**
 * @see https://phpstan.org/blog/zero-config-analysis-with-static-reflection
 * @see https://github.com/rectorphp/rector/issues/3490
 */
final class DynamicSourceLocatorDecorator
{
    /**
     * @readonly
     * @var \Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider
     */
    private $dynamicSourceLocatorProvider;
    /**
     * @readonly
     * @var \Rector\Core\FileSystem\PhpFilesFinder
     */
    private $phpFilesFinder;
    /**
     * @readonly
     * @var \Rector\Core\FileSystem\FileAndDirectoryFilter
     */
    private $fileAndDirectoryFilter;
    /**
     * @readonly
     * @var \Rector\Core\FileSystem\FilesystemTweaker
     */
    private $filesystemTweaker;
    public function __construct(DynamicSourceLocatorProvider $dynamicSourceLocatorProvider, PhpFilesFinder $phpFilesFinder, FileAndDirectoryFilter $fileAndDirectoryFilter, FilesystemTweaker $filesystemTweaker)
    {
        $this->dynamicSourceLocatorProvider = $dynamicSourceLocatorProvider;
        $this->phpFilesFinder = $phpFilesFinder;
        $this->fileAndDirectoryFilter = $fileAndDirectoryFilter;
        $this->filesystemTweaker = $filesystemTweaker;
    }
    /**
     * @param string[] $paths
     */
    public function addPaths(array $paths) : void
    {
        if ($paths === []) {
            return;
        }
        $paths = $this->filesystemTweaker->resolveWithFnmatch($paths);
        $files = $this->fileAndDirectoryFilter->filterFiles($paths);
        $this->dynamicSourceLocatorProvider->addFiles($files);
        $directories = $this->fileAndDirectoryFilter->filterDirectories($paths);
        foreach ($directories as $directory) {
            $filesInDirectory = $this->phpFilesFinder->findInPaths([$directory]);
            $this->dynamicSourceLocatorProvider->addFilesByDirectory($directory, $filesInDirectory);
        }
    }
    public function isPathsEmpty() : bool
    {
        return $this->dynamicSourceLocatorProvider->isPathsEmpty();
    }
}

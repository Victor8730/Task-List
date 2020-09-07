<?php

declare(strict_types=1);

namespace Install;

use Core\Model;
use Core\Validator;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Exceptions\FailedCopyException;
use Exceptions\FailedCreateDirException;
use \Models\Task as Task;

class Install extends Validator
{
    public function copyFileAndDirectory(string $dirSource, string $dirDestination): void
    {
        $validator = new Validator();
        $dir = opendir($dirSource);

        while (($file = readdir($dir)) !== false) {
            if (is_dir($dirSource . "/" . $file) && $file != "." && $file != "..") {
                try {
                    if (!file_exists($dirDestination . "/" . $file)) {
                        $validator->checkMakeDir($dirDestination . "/" . $file);
                    }
                } catch (FailedCreateDirException $e) {
                }
                $this->copyFileAndDirectory($dirSource . "/" . $file, $dirDestination . "/" . $file);
            }
            if (is_file($dirSource . "/" . $file) && !file_exists($dirDestination . "/" . $file)) {
                try {
                    $validator->checkCopyFile($dirSource . "/" . $file, $dirDestination . "/" . $file);
                } catch (FailedCopyException $e) {
                }
            }
        }
        closedir($dir);
    }

    public function initialData(array $data): void
    {
        foreach ($data as $dataItem) {
            $model = new Model();
            $task = new Task();
            $model->setParameters($task, $dataItem);

            try {
                $model->entityManager->persist($task);
            } catch (ORMException $e) {
                echo $e->getMessage();
            }

            try {
                $model->entityManager->flush();
                echo 'load initial data - ok' . "\n";
            } catch (OptimisticLockException $e) {
                echo $e->getMessage();
            } catch (ORMException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function clearCache($address)
    {
        if (file_exists($address . '/Cache/')) {
            foreach (glob($address . '/Cache/*') as $folder) {
                foreach (glob($folder . '/*') as $file2) {
                    unlink($file2);
                }
                rmdir($folder);
            }
        }
    }
}
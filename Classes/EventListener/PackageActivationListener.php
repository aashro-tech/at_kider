<?php

namespace AASHRO\Atkider\EventListener;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Package\Event\AfterPackageActivationEvent;

class PackageActivationListener
{
    public function __invoke(AfterPackageActivationEvent $event): void
    {
        $extensionKey = $event->getPackageKey();

        // Perform your custom logic
        if ($extensionKey === 'at_kider') {
            if (Environment::getProjectPath() !== Environment::getPublicPath()) {
                $additional = Environment::getConfigPath() . '/system/additional.php';
            }
            $additional = Environment::getLegacyConfigPath() . '/system/additional.php';

            if (file_exists($additional)) {
                $additionalFileContent = file_get_contents($additional);
                // Content to add or update
                $newCode = "\n// Additional TYPO3 configuration for mask\n" .
                    "\$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask'] = [\n".
                    "\t'backend' => 'EXT:at_kider/Resources/Private/Mask/Backend/Templates',\n".
                    "\t'content' => 'EXT:at_kider/Resources/Private/Mask/Frontend/Templates',\n".
                    "\t'json' => 'EXT:at_kider/Configuration/Mask/mask.json',\n".
                    "\t'layouts' => 'EXT:at_kider/Resources/Private/Mask/Frontend/Layouts',\n".
                    "\t'layouts_backend' => 'EXT:at_kider/Resources/Private/Mask/Backend/Layouts',\n".
                    "\t'partials' => 'EXT:at_kider/Resources/Private/Mask/Frontend/Partials',\n".
                    "\t'partials_backend' => 'EXT:at_kider/Resources/Private/Mask/Backend/Partials',\n".
                    "\t'preview' => 'EXT:at_kider/Resources/Public/Mask/',\n".
                    "];\n";

                // Check if the code already exists to avoid duplicates
                if (strpos($additionalFileContent, $newCode) === false) {
                    // Append new code
                    $updatedContent = $additionalFileContent . $newCode;

                    // Write back to the file
                    file_put_contents($additional, $updatedContent);
                }
            }
        }
    }
}

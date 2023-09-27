<?php
defined('TYPO3') or die('¯\_(ツ)_/¯');

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Http\ApplicationType;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

// Only evaluate this in the backend
if (($GLOBALS['TYPO3_REQUEST'] ?? null) instanceof ServerRequestInterface
    && ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isBackend()
) {
    ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:h5p/Configuration/TsConfig/ContentElementWizard.tsconfig">');

    call_user_func(
        function ($extKey) {
            $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get($extKey);
            if (!isset($extConf['onlyAllowRecordsInSysfolders']) || (int)$extConf['onlyAllowRecordsInSysfolders'] === 0) {
                $GLOBALS['TCA']['tx_h5p_domain_model_content']['ctrl']['security']['ignorePageTypeRestriction'] = true;
            }
        },
        'h5p'
    );
    $GLOBALS['TCA']['tx_h5p_domain_model_configsetting']['ctrl']['security']['ignorePageTypeRestriction'] = true;
}


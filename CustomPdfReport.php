<?php
/**
 * Matomo - free/libre analytics platform
 * Plugin developed for Web Analytics Italia (https://webanalytics.italia.it)
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\CustomPdfReport;

use Piwik\ReportRenderer;

class CustomPdfReport extends \Piwik\Plugin
{
    /**
     * Get event handlers.
     *
     * @return array the event handlers
     */
    public function registerEvents()
    {
        return [
            'ScheduledReports.getRendererInstance' => [
                'after'   => true,
                'function' => 'getRendererInstance',
            ]
        ];
    }

    /**
     * Return a custom renderer instance.
     */
    public function getRendererInstance(&$reportRenderer, $reportType, $outputType, $report)
    {
        $reportFormat = $report['format'];

        if (ReportRenderer::PDF_FORMAT !== $reportFormat) {
            return;
        }

        $reportRenderer = new CustomPdfRenderer();
    }
}

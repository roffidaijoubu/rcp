<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardTableSeeder extends Seeder
{
    public function run()
    {
        $dashboards = [
            [
                'id' => 32,
                'category' => 'General',
                'name' => 'Asset Health',
                'site_name' => '',
                'workbook_name' => 'AssetCondition_16399997927760',
                'view_name' => 'AssetCriteriaDashboard',
                'created_at' => '2023-12-01 02:54:50',
                'updated_at' => '2023-12-03 15:38:48'
            ],
            [
                'id' => 27,
                'category' => 'Cost',
                'name' => 'Maintenance Cost',
                'site_name' => '',
                'workbook_name' => 'MaintenanceCost_16399998839970',
                'view_name' => 'MaintenanceCostDashboard',
                'created_at' => '2023-12-01 02:43:31',
                'updated_at' => '2023-12-03 15:38:59'
            ],
            [
                'id' => 50,
                'category' => 'General',
                'name' => 'AM Maturity Level ISO 55001 : 2014',
                'site_name' => null,
                'workbook_name' => 'AMMaturityLevelPGN',
                'view_name' => 'Dashboard1',
                'created_at' => '2023-12-05 06:05:35',
                'updated_at' => '2023-12-05 06:05:50'
            ],
            [
                'id' => 28,
                'category' => 'Risk',
                'name' => 'Pipeline Risk',
                'site_name' => null,
                'workbook_name' => 'PIMS',
                'view_name' => 'DashboardRisk',
                'created_at' => '2023-12-01 02:44:46',
                'updated_at' => '2023-12-01 02:44:46'
            ],
            [
                'id' => 31,
                'category' => 'General',
                'name' => 'Asset Criticality',
                'site_name' => null,
                'workbook_name' => 'GeneralVIewCRP_16399998509250',
                'view_name' => 'DashboardFL',
                'created_at' => '2023-12-01 02:52:02',
                'updated_at' => '2023-12-01 02:52:02'
            ],
            [
                'id' => 34,
                'category' => 'General',
                'name' => 'Functional Location Generator',
                'site_name' => null,
                'workbook_name' => 'DashboardAssetNumberGeneratorPGN',
                'view_name' => 'DashboardAssetSpatial',
                'created_at' => '2023-12-01 02:57:11',
                'updated_at' => '2023-12-01 02:57:11'
            ],
            [
                'id' => 35,
                'category' => 'Performance',
                'name' => 'Schedule Compliance',
                'site_name' => null,
                'workbook_name' => 'PerformanceView_16399999372440',
                'view_name' => 'ScheduleComplianceDashboard',
                'created_at' => '2023-12-01 04:00:43',
                'updated_at' => '2023-12-01 04:00:43'
            ],
            [
                'id' => 36,
                'category' => 'Performance',
                'name' => 'Maintenance Backlog',
                'site_name' => null,
                'workbook_name' => 'PerformanceView_16399999372440',
                'view_name' => 'MaintenanceBacklogDashboard',
                'created_at' => '2023-12-01 04:01:06',
                'updated_at' => '2023-12-01 04:01:06'
            ],
            [
                'id' => 37,
                'category' => 'Performance',
                'name' => 'PM Percentage',
                'site_name' => null,
                'workbook_name' => 'PerformanceView_16399999372440',
                'view_name' => 'PreventiveMaintenancePercentageDashboard',
                'created_at' => '2023-12-01 04:01:30',
                'updated_at' => '2023-12-01 04:01:30'
            ],
            [
                'id' => 38,
                'category' => 'Performance',
                'name' => 'Emergency Work Ratio',
                'site_name' => null,
                'workbook_name' => 'PerformanceView_16399999372440',
                'view_name' => 'EmergencyWorkRatioDashboard',
                'created_at' => '2023-12-01 04:01:52',
                'updated_at' => '2023-12-01 04:01:52'
            ],
            [
                'id' => 39,
                'category' => 'Performance',
                'name' => 'Operational Availability',
                'site_name' => null,
                'workbook_name' => 'OperationalAvailability_16399999162240',
                'view_name' => 'OperationalAvailabilityDashboard',
                'created_at' => '2023-12-01 04:02:26',
                'updated_at' => '2023-12-01 04:02:26'
            ],
            [
                'id' => 40,
                'category' => 'Performance',
                'name' => 'Reliability',
                'site_name' => null,
                'workbook_name' => 'RiskView_16399999584260',
                'view_name' => 'MTBFDashboard',
                'created_at' => '2023-12-01 04:03:10',
                'updated_at' => '2023-12-01 04:03:10'
            ],
            [
                'id' => 41,
                'category' => 'Performance',
                'name' => 'Maintainability',
                'site_name' => null,
                'workbook_name' => 'RiskView_16399999584260',
                'view_name' => 'MTTRDashboard',
                'created_at' => '2023-12-01 04:03:31',
                'updated_at' => '2023-12-01 04:03:31'
            ],
            [
                'id' => 42,
                'category' => 'Performance',
                'name' => 'Schedule Forecast',
                'site_name' => null,
                'workbook_name' => 'PerformanceView_16399999372440',
                'view_name' => 'ScheduleForecastDashboardNEW',
                'created_at' => '2023-12-01 04:03:53',
                'updated_at' => '2023-12-01 04:03:53'
            ],
            [
                'id' => 25,
                'category' => 'General',
                'name' => 'General View CRP',
                'site_name' => null,
                'workbook_name' => 'GeneralVIewCRP_16399998509250',
                'view_name' => 'GeneralViewDashboard',
                'created_at' => '2023-11-27 08:42:59',
                'updated_at' => '2023-12-01 08:59:51'
            ],
            [
                'id' => 33,
                'category' => 'General',
                'name' => 'Master Data Growth',
                'site_name' => '',
                'workbook_name' => 'GeneralVIewCRP_16399998509250',
                'view_name' => 'AssetGrowth',
                'created_at' => '2023-12-01 02:56:15',
                'updated_at' => '2023-12-03 13:33:14'
            ]
        ]
        ;

        foreach ($dashboards as $dashboard) {
            DB::table('dashboards')->insert([
                'id' => $dashboard['id'],
                'category' => $dashboard['category'],
                'name' => $dashboard['name'],
                'site_name' => $dashboard['site_name'] ?: null, // Convert empty string to null
                'workbook_name' => $dashboard['workbook_name'],
                'view_name' => $dashboard['view_name'],
                'created_at' => Carbon::parse($dashboard['created_at']),
                'updated_at' => Carbon::parse($dashboard['updated_at'])
            ]);
        }
    }
}

<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\Login;
use App\Filament\Pages\MyProfile;

use App\Filament\Pages\HomePageSettings;
use App\Filament\Resources\AddonResource;
use App\Filament\Resources\BundleResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\PageResource;
use App\Filament\Resources\StaffResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
 

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarFullyCollapsibleOnDesktop()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->colors([
                'primary' => '#149fd8',
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->darkModeBrandLogo(asset('img/logo-light.png'))
            ->brandLogo(asset('img/logo-light.png'))
            ->brandLogoHeight('5rem')
            ->profile(page: MyProfile::class,isSimple:false)
            ->databaseNotifications()
            ->navigationItems([
                NavigationItem::make('Support')
                    ->url('#')
                    ->icon('bx-support')
                    ->group('Ticketing')
                    ->sort(3),
                NavigationItem::make('Chat')
                    ->url('#')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->group('Ticketing')
                    ->sort(3),
                NavigationItem::make('CDR Report')
                    ->url('#')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
                NavigationItem::make('Usage Report')
                    ->url('#')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
                NavigationItem::make('Device Usage Report')
                    ->url('#')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
                NavigationItem::make('Product Usage Report')
                    ->url('#')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
                NavigationItem::make('Wallet')
                    ->icon('heroicon-o-wallet')
                    ->url('#')
                    ->sort(98),
                NavigationItem::make('Settings')
                    ->icon('fas-gear')
                    ->url('#')
                    ->sort(100),
                NavigationItem::make('Inventory')
                    ->icon('fas-warehouse')
                    ->url('#')
                    ->sort(97),
                NavigationItem::make('Agent')
                    ->icon('heroicon-o-circle-stack')
                    ->url('#')
                    ->sort(99)
            ]);
            
    }


    public function boot(){

        FilamentView::registerRenderHook(
            PanelsRenderHook::SIDEBAR_FOOTER,
            fn (): string => Blade::render('@livewire(\'logout\')'),
        );
    }
}

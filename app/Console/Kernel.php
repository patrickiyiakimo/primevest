protected $commands = [
    \App\Console\Commands\CompleteInvestments::class,
];

protected function schedule(Schedule $schedule)
{
    $schedule->command('investments:complete')->daily();
}
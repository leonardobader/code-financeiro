<?php

use Illuminate\Database\Seeder;

/**
 * Class BankAccountsTableSeeder
 */
class BankAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \CodeFin\Repositories\BankRepository $repository */
        $repository = app(\CodeFin\Repositories\BankRepository::class);
        $banks = $repository->all();
        $max = 15;
        $bankAccountId = rand(1,$max);

        factory(\CodeFin\Models\BankAccount::class, $max)
            ->make()
            ->each(function ($bankAccount) use($banks, $bankAccountId){
                $bank = $banks->random();
                $bankAccount->bank_id = $bank->id;

                $bankAccount->save();

                if($bankAccountId == $bankAccount->id){
                    $bankAccount->default = 1;
                    $bankAccount->save();
                }

            });
    }

    private function getBancos() {
        $repository = app(\CodeFin\Repositories\BankRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}

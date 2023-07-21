
<?php
// functions
    function accountNumberGen () {
        $iban = '';
        $cn = sprintf('%02d', mt_rand(0, 99));
        $bn = '3500 0';
        $un1 = sprintf('%03d', mt_rand(0, 999));
        $un2 = sprintf('%04d', mt_rand(0, 9999));
        $un3 = sprintf('%04d', mt_rand(0, 9999));
        $iban = "LT$cn $bn$un1 $un2 $un3";
        return $iban;
    }

    $accountNumber = accountNumberGen();
?>

<div class="row  justify-content-md-center">
    <div class="col-lg-6 col-12">
        <div class="">
            <h3 class = " title">Sukurti naują sąskaitą</h3>
            <div class="table-form">
                <form action="/accounts/store" method="post">
                    <div class="mb-3">
                        <label class="form-label" required>Vardas</label>
                        <input class="form-control" name="name" type="text" value="<?= $old['name'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"required>Pavardė</label>
                        <input class="form-control" name="surname" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" required>Asmens kodas</label>
                        <input class="form-control"  name="personID"  type="number" minlength="11" maxlength="11">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banko sąskaita</label>
                        <input class="form-control" type="text" name="accountNumber" aria-label=" input example" value="<?= $accountNumber?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="number" name="balance" value = "0" aria-label="readonly input example" hidden>
                    </div>
                    <button type="button" class="btn onHover mt-4">
                    <a class="" href="./"> Atgal</a>
                    </button>
                    <button type="submit" class="btn onHover mt-4">Išsaugoti</button>
                </form>
            </div>
        </div>
    </div>
</div>
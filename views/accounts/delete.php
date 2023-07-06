<div class="row  justify-content-md-center">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Ištrinti sąskaitą?
            </div>
            <div class="card-body">
                <form action="/accounts/destroy/<?=$account['id']?>" method="post">
                    <div class="mb-3">
                        <label class="form-label" required>Vardas: <?= $account['name']?></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"required>Pavardė: <?=$account['surname']?></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" required>Asmens kodas: <?=$account['personID']?></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banko sąskaita: <?=$account['accountNumber']?></label>
                    </div>
                    <button type="submit" class="btn btn-danger mt-4">Ištrinti</button>
                </form>
                <button type="button" class="btn btn-secondary mt-4">
                <a class="buttonLink" href="/accounts"> Grįžti</a>
                </button>
            </div>
        </div>
    </div>
</div>
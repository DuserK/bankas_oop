<div class="row  justify-content-md-center">
    <div class="col-lg-6 col-12">
        <div class="">
            <h3 class="title">
                Ištrinti sąskaitą?
            </h3>
            <div class="">
                <form class = table-form action="/accounts/destroy/<?=$account['id']?>" method="post">
                    <div class="mb-3">
                        <label class="form-label" required>Vardas: <span><?= $account['name']?></span></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"required>Pavardė: <span><?=$account['surname']?></span></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" required>Asmens kodas: <span><?=$account['personID']?></span></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banko sąskaita: <span><?=$account['accountNumber']?></span></label>
                    </div>
                    <button type="button" class="btn onHover">
                    <a class="buttonLink" href="/accounts"> Grįžti</a>
                    </button>
                    <button type="submit" class="btn onHover  btn-red">Trinti</button>
                </form>
            </div>
        </div>
    </div>
</div>
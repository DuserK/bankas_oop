<div class="row  justify-content-md-center">
    <div class="col-lg-6 col-12">
        <div class="">
            <h3 class="title">
                Redaguoti sąskaitą
            </h3>
            <div class="">
                <form class = "table-form" action="/accounts/update/<?=$account['id']?>" method="post">
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
                    <div class="mb-3">
                        <label class="form-label">Balansas:  <span><?=$account['balance']?> €</span></label>
                    </div>
                    <div class="mb-3">
                        <label for="amount">Redaguoti balansą:</label>
                        <input class="form-control" type="number" min = "0" name="amount" id="amount" placeholder="Įveskite sumą" required>
                    </div>
                    <button type="button" class="btn  onHover mt-4">
                    <a class="buttonLink" href="/accounts"> Grįžti</a>
                    </button>
                    <button type="submit" class="btn  onHover btn-green mt-4"  name="add" value=1>Pridėti</button>
                    <button type="submit" class="btn  onHover btn-red mt-4" name="withdraw" value=1>Nuskaičiuoti</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
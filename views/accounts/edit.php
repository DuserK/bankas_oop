<div class="row  justify-content-md-center">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Radaguoti sąskaitą
            </div>
            <div class="card-body">
                <form action="/accounts/update/<?=$account['record_id']?>" method="post">
                    <div class="mb-3">
                        <label class="form-label" required>Vardas:</label>
                        <input class="form-control" name="name" type="text" value="<?=$account['name']?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"required>Pavardė:</label>
                        <input class="form-control" name="surname" type="text" value="<?=$account['surname']?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" required>Asmens kodas:</label>
                        <input class="form-control"  name="personID"  type="number"  value="<?=$account['personID']?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banko sąskaita:</label>
                        <input class="form-control" type="text" name="accountNumber" aria-label=" input example"  value="<?=$account['accountNumber']?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Balansas:</label>
                        <input class="form-control" type="number" name="balance" aria-label="readonly input example" value="<?=$account['balance']?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="amount">Redaguoti balansą:</label>
                        <input class="form-control" type="number" min = "0" name="amount" id="amount" placeholder="Įveskite sumą" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-4"  name="add" value=1>Pridėti</button>
                    <button type="submit" class="btn btn-danger mt-4" name="withdraw" value=1>Išimti</button>
                </form>
                <button type="button" class="btn btn-secondary mt-4">
                <a class="buttonLink" href="/accounts"> Grįžti</a>
                </button>
            </div>
        </div>
    </div>
</div>
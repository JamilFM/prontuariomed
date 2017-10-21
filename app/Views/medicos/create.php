<form class="paciente-form col s12" action="/add/medico" method="post">

    <div class="row">

        <div class="input-field col s12">
            <label for="nomeCompleto">Nome Completo: </label>

            <input type="text" name="nomeCompleto" id="nomeCompleto" value="<?php echo $dados['nomeCompleto'] ?>" required>

        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <label for="crm">CRM: </label>

            <input type="text" name="crm" id="crm" value="<?php echo $dados['crm'] ?>" required>
            <span class="red-text">
                <?php echo $crm_error ?>
            </span>
        </div>
        <div class="input-field col s6">
            <label for="cpf">CPF: </label>

            <input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf'] ?>" required>
            <span class="red-text">
                <?php echo $cpf_error ?>
            </span>
        </div>
    </div>

    <div class="row">

        <div class="input-field col s6">
            <label for="rg">RG: </label>

            <input type="text" name="rg" id="rg" value="<?php echo $dados['rg'] ?>" required>
            <span class="red-text">
                <?php echo $rg_error ?>
            </span>
        </div>
        <div class="input-field col s6">
            <label for="email">Email: </label>

            <input type="email" name="email" id="email" value="<?php echo $dados['email'] ?>" required>
        </div>
    </div>
    <div class="row">

        <div class="input-field col s6">
            <label for="naturalidade">Naturalidade: </label>

            <input type="text" name="naturalidade" id="naturalidade" value="<?php echo $dados['naturalidade'] ?>">
        </div>
        <div class="input-field col s6">
            <label for="nacionalidade">Nacionalidade: </label>

            <input type="text" name="nacionalidade" id="nacionalidade" value="<?php echo $dados['nacionalidade'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <label for="telefone">Telefone: </label>

            <input type="text" name="telefone" id="telefone" value="<?php echo $dados['telefone'] ?>">
        </div>
        <div class="input-field col s6">
            <label for="celular">Celular: </label>

            <input type="text" name="celular" id="celular" value="<?php echo $dados['celular'] ?>" required>

        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <label for="bairro">Bairro: </label>

            <input type="text" name="bairro" id="bairro" value="<?php echo $dados['bairro'] ?>" required>
        </div>
    </div>
    <div class="row">

        <div class="input-field col s12">
            <label for="endereco">Endereço: </label>

            <input type="text" name="endereco" id="endereco" value="<?php echo $dados['endereco'] ?>" required>
        </div>
    </div>
    <div class="row">

        <div class="input-field col s6">
            <label for="complemento">Complemento: </label>

            <input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento'] ?>">
        </div>

        <div class="input-field col s6">
            <label for="cep">Cep: </label>

            <input type="text" name="cep" id="cep" value="<?php echo $dados['cep'] ?> required">
        </div>
    </div>

    <div class="row">

        <div class="input-field col s12">
            <label for="datanascimento">Data de Nascimento: </label>

            <input type="text" name="datanascimento" id="datanascimento" class="datepicker" value="<?php echo $dados['datanascimento'] ?>"
                   required>
        </div>
    </div>
    <div class="row">

        <div class="input-field col s6">
            <label for="trabalho">Trabalho: </label>

            <input type="text" name="trabalho" id="trabalho" value="<?php echo $dados['trabalho'] ?>">
        </div>

        <div class="input-field col s6">
            <select id="idestado" name="idestado" onChange="showHint(this.value)">
                <option value="" disabled selected>Escolha o Estado</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado['id']; ?>">
                        <?php echo utf8_encode($estado['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="estado">Estado: </label>

        </div>
    </div>
    <div class="row">

        <div class="input-field col s12">

            <select name="idcidade" disabled id="idcidade">

                <option>Escolha a cidade</option>

            </select>

            <label for="idcidades">Cidade: </label>

        </div>
        <span class="red-text">
            <?php echo $cidade_error ?>
        </span>
    </div>
    <div class="row">

        <div class="input-field col s12">

            <select id="idesp" name="idesp">
                <option value="" disabled selected>Escolha a sua especialidade</option>
                <?php foreach ($especialidades as $especialidade): ?>
                    <option value="<?php echo $especialidade['id']; ?>">
                        <?php echo utf8_encode($especialidade['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>


            <label for="idesp">Especialidades: </label>

        </div>
        <span class="red-text">
            <?php echo $especialidade_error ?>
        </span>
    </div>
    <div class="fixed-action-btn horizontal">
        <button class="btn-floating btn-large #ff1744 red accent-3" type="submit">
            <i class="large material-icons">save</i>
        </button>
    </div>
</form>
<?php require_once "views/shared/header.php";?>
<h1>ANTES Y DESPUES DE APLICAR LOS SALVAGUARDAS</h1>
<div class="d-flex justify-content-evenly py-3">
    <table class="table table-bordered" style="width:540px;height:500px;border-style: solid;">
        <tbody>
          <tr style="height:8px">
            <td></td>
            <td colspan="5" class="py-0" style="text-align: center;"><b>ANTES</b></td>
            <td></td>
          </tr>
          <tr>
            <td scope="row" rowspan="5"><br/><br/><br/>P<br/>R<br/>O<br/>B<br/>A<br/>B<br/>I<br/>L<br/>I<br/>D<br/>A<br/>D</td>
            <td scope="row">5 (MF)</td>
            <td class="table-success"><?=$data["ActivosPosiciones"][20]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][21]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][22]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][23]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][24]?></td>
          </tr>
          <tr>
            <td scope="row">4 (F)</td>
            <td class="table-success"><?=$data["ActivosPosiciones"][15]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][16]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][17]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][18]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][19]?></td>
          </tr>
          <tr >
            <td scope="row">3 (N)</td>
            <td class="table-success"><?=$data["ActivosPosiciones"][10]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][11]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][12]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][13]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][14]?></td>
          </tr>
          <tr>
            <td scope="row">2 (PF)</td>
            <td class="table-success"><?=$data["ActivosPosiciones"][5]?></td>
            <td class="table-success"><?=$data["ActivosPosiciones"][6]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][7]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][8]?></td>
            <td class="table-secondary"><?=$data["ActivosPosiciones"][9]?></td>
          </tr>
          <tr>
            
            <td scope="row">1 (MPF)</td>
            <td class="table-success"><?=$data["ActivosPosiciones"][0]?></td>
            <td class="table-success"><?=$data["ActivosPosiciones"][1]?></td>
            <td class="table-success"><?=$data["ActivosPosiciones"][2]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][3]?></td>
            <td class="table-warning"><?=$data["ActivosPosiciones"][4]?></td>
          </tr>
          <tr>
            <td scope="row"></td>
            <td scope="row"></td>
            <td>(0 - 2]</td>
            <td>(2 - 4]</td>
            <td>(4 - 6]</td>
            <td>(6 - 8]</td>
            <td>(8 - 9]</td>
          </tr>
          <tr style="height:8px">
            <td></td>
            <td></td>
            <td colspan="5" class="py-0" style="text-align: center;">IMPACTO</td>
          </tr>
        </tbody>
    </table>

    <table class="table table-bordered" style="width:540px;height:500px;border-style: solid;">
        <tbody>
          <tr style="height:8px">
            <td></td>
            <td colspan="5" class="py-0" style="text-align: center;"><b>DESPUES</b></td>
            <td></td>
          </tr>
          <tr>
            <td scope="row" rowspan="5"><br/><br/><br/>P<br/>R<br/>O<br/>B<br/>A<br/>B<br/>I<br/>L<br/>I<br/>D<br/>A<br/>D</td>
            <td scope="row">5 (MF)</td>
            <td class="table-success"><?=$data["ActivosMPDespues"][20]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][21]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][22]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][23]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][24]?></td>
          </tr>
          <tr>
            <td scope="row">4 (F)</td>
            <td class="table-success"><?=$data["ActivosMPDespues"][15]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][16]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][17]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][18]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][19]?></td>
          </tr>
          <tr >
            <td scope="row">3 (N)</td>
            <td class="table-success"><?=$data["ActivosMPDespues"][10]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][11]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][12]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][13]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][14]?></td>
          </tr>
          <tr>
            <td scope="row">2 (PF)</td>
            <td class="table-success"><?=$data["ActivosMPDespues"][5]?></td>
            <td class="table-success"><?=$data["ActivosMPDespues"][6]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][7]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][8]?></td>
            <td class="table-secondary"><?=$data["ActivosMPDespues"][9]?></td>
          </tr>
          <tr>
            <td scope="row">1 (MPF)</td>
            <td class="table-success"><?=$data["ActivosMPDespues"][0]?></td>
            <td class="table-success"><?=$data["ActivosMPDespues"][1]?></td>
            <td class="table-success"><?=$data["ActivosMPDespues"][2]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][3]?></td>
            <td class="table-warning"><?=$data["ActivosMPDespues"][4]?></td>
          </tr>
          <tr>
            <td scope="row"></td>
            <td scope="row"></td>
            <td>(0 - 2]</td>
            <td>(2 - 4]</td>
            <td>(4 - 6]</td>
            <td>(6 - 8]</td>
            <td>(8 - 9]</td>
          </tr>
          <tr style="height:8px">
            <td></td>
            <td></td>
            <td colspan="5" class="py-0" style="text-align: center;">IMPACTO</td>
          </tr>
        </tbody>
    </table>    
  </div>

<script>
</script>
<?php require_once "views/shared/footer.php"; ?>
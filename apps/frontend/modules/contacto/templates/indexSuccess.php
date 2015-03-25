<? include_partial('global/menu') ?>

<div id="display">
  <div id="contact-container">
    <?=jq_form_remote_tag(array(
        'update'  => 'contact-container',
        'url'     => '@enviar_mensaje_form_contacto',
        'loading' => '$("#enviar-mensaje-buttons").hide();$("#enviar-mensaje-indicator").show();',
//        'complete' => '$("#enviar-mensaje-indicator").fadeOut();',
    ), array(
        'id'     => 'enviar-mensaje-form',
        'method' => 'post',
    ));?>
    
      <?=$form->renderHiddenFields()?>
      <div class="row">
        <?=$form['nombre']->renderLabel('Nombre:')?>
        <?=$form['nombre']->render(array('class' => 'text'))?>
      </div>
      <div class="row">
        <?=$form['email']->renderLabel('E-Mail:')?>
        <?=$form['email']->render(array('class' => 'text'))?>
      </div>
      <div class="row">
        <?=$form['telefono']->renderLabel('Teléfono:')?>
        <?=$form['telefono']->render(array('class' => 'text'))?>
      </div>
      <div class="row last">
        <?=$form['mensaje']->renderLabel('Consulta:')?>
        <?=$form['mensaje']->render(array('class' => 'textarea'))?>
      </div>

      <div id="enviar-mensaje-buttons" class="row last">
        <input name="enviar" type="submit" id="enviar-consulta" value="Enviar" />
      </div>
      
      <div id="enviar-mensaje-indicator" class="row last" style="display:none;">
        <div class="enviando">
          <span>Enviando...</span>
          <?=image_tag('enviando.gif', array('width' => '33', 'height' => '32'))?>
        </div>
        <?=link_to('Cancelar', '@contacto', array('id' => 'cancelar-envio', 'class' => 'button'))?>
      </div>

    </form>
  </div>
</div>
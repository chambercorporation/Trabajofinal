1 Query usada para registrar usuarios
  INSERT INTO usuario(ID_usuario,Nombre,contrasenna,Correo) VALUES('','".$datos['nombre']."','".$datos['clave']."','".$datos['correo']."')";

2 Query usada para ingresar las claves foraneas
  INSERT INTO jugador(usuario_ID_usuario, dedicacion_ID_dedicacion, 
    tipo_jugador_ID_Tipo, preferencias_personales_ID_preferencias, historial_ID_historial,
    experiencia_ID_externos, pericia_ID_pericia, categoria_ID_categoria,resultado_ID_resultado)
    VALUES('".$datos['id_usuario']."','".$datos['dedicacion']."','".$datos['tipo']."',
    '".$datos['preferencias']."','".$datos['historial']."','".$datos['conocimientos']."',
    '".$datos['pericia']."','".$datos['juego']."','".$datos['id_juego']."')";

3 Query usada para crear el trigger de usuarios eliminados
  DELIMITER //
CREATE TRIGGER registro_eliminaciones BEFORE DELETE ON usuario FOR EACH ROW
BEGIN
    INSERT INTO usuarios_eliminados SELECT *, curtime(), curdate() FROM usuario 
    WHERE ID_Usuario = old.ID_usuario;
END //
DELIMITER ;

4 Query usada para crear el trigger de historicos usuarios
  DELIMITER //
CREATE TRIGGER registro_usuarios AFTER INSERT ON usuario FOR EACH ROW
    BEGIN
        INSERT INTO historico_usuario (Nombre, contrasenna, Correo, hora, fecha) VALUES (NEW.Nombre, NEW.contrasenna, NEW.Correo, curtime(), curdate());
    END //
DELIMITER ;

5 Query usada para traer el juego final
  SELECT j.resultado_ID_resultado, r.Juego_resultado AS juego FROM jugador as j JOIN resultado as r ON j.resultado_ID_resultado=r.ID_resultado WHERE usuario_ID_usuario = '$id_persona'";

6 Querys para darle valor a los datos desde la base a nuestro resultado
  SELECT * FROM dedicacion where ID_dedicacion=".$datos['dedicacion'];
SELECT * FROM tipo_jugador where ID_tipo=".$datos['tipo'];
SELECT * FROM preferencias_personales where ID_preferencias=".$datos['preferencias'];
SELECT * FROM historial where ID_historial=".$datos['historial'];
SELECT * FROM experiencia where ID_externos=".$datos['conocimientos'];
SELECT * FROM pericia where ID_pericia=".$datos['pericia'];
SELECT * FROM categoria where ID_categoria=".$datos['juego'];
SELECT * FROM resultado where Valor_final=$sumatotal";

7 Querys usadas para traer la ID desde la base a nuestro modal
  SELECT ID_Tipo,Tipo_jugador,Valor_tipo FROM tipo_jugador";
SELECT ID_historial,Tipo_historial FROM historial";
SELECT ID_externos,Tipo_experiencia FROM experiencia";
SELECT ID_pericia,Tipo_pericia FROM pericia";
SELECT ID_preferencias,Preferencias FROM preferencias_personales";
SELECT ID_categoria,Tipo_categoria FROM categoria";
SELECT ID_dedicacion,Tipo_dedicacion FROM dedicacion";
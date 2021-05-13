/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.time.LocalDate;

/**
 *
 * @author arambarri.oihana
 */
public class Reserve {
    private String dni;
    private LocalDate dia_reservado;
    private int idLata;
    private LocalDate dia_dereserva;

    public Reserve(String dni,int idLata, String dia_reservado,  String dia_dereserva) {
        this.dni=dni;
        this.dia_reservado = LocalDate.parse(dia_reservado);
        this.idLata = idLata;
        this.dia_dereserva = LocalDate.parse(dia_dereserva);
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    

    public int getIdLata() {
        return idLata;
    }

    public void setIdLata(int idLata) {
        this.idLata = idLata;
    }

    public LocalDate getDia_reservado() {
        return dia_reservado;
    }

    public void setDia_reservado(String dia_reservado) {
        this.dia_reservado = LocalDate.parse(dia_reservado);
    }

    public LocalDate getDia_dereserva() {
        return dia_dereserva;
    }

    public void setDia_dereserva(String dia_dereserva) {
        this.dia_dereserva = LocalDate.parse(dia_dereserva);
    }

    @Override
    public String toString() {
        return "Reserve{" + "Dni=" + dni + ", dia_reservado=" + dia_reservado + ", idLata=" + idLata + ", dia_dereserva=" + dia_dereserva + '}';
    }

    

    
    
    
    
    
}

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
    private Member m1;
    private LocalDate dia_reservado;
    private int idLata;
    private LocalDate dia_dereserva;

    public Reserve(Member m1,int idLata, String dia_reservado,  String dia_dereserva) {
        this.m1 = m1;
        this.dia_reservado = LocalDate.parse(dia_reservado);
        this.idLata = idLata;
        this.dia_dereserva = LocalDate.parse(dia_dereserva);
    }

    public Member getM1() {
        return m1;
    }

    public void setM1(Member m1) {
        this.m1 = m1;
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

    public void setDia_reservado(LocalDate dia_reservado) {
        this.dia_reservado = dia_reservado;
    }

    public LocalDate getDia_dereserva() {
        return dia_dereserva;
    }

    public void setDia_dereserva(LocalDate dia_dereserva) {
        this.dia_dereserva = dia_dereserva;
    }

    @Override
    public String toString() {
        return "Reserve{" + "m1=" + m1 + ", dia_reservado=" + dia_reservado + ", idLata=" + idLata + ", dia_dereserva=" + dia_dereserva + '}';
    }

    

    
    
    
    
    
}

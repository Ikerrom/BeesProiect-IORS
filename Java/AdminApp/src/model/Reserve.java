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
    /**
     * Private atributes
     */
    private String dni;
    private LocalDate dia_reservado;
    private int idLata;
    private LocalDate dia_dereserva;
    /**
     * 
     * @param dni dni of member
     * @param idLata id of lata
     * @param dia_reservado date reserved
     * @param dia_dereserva reservation day
     */
    public Reserve(String dni,int idLata, String dia_reservado,  String dia_dereserva) {
        this.dni=dni;
        this.dia_reservado = LocalDate.parse(dia_reservado);
        this.idLata = idLata;
        this.dia_dereserva = LocalDate.parse(dia_dereserva);
    }
    /**
     * 
     * @return dni of member
     */
    public String getDni() {
        return dni;
    }
    /**
     * 
     * @param dni Sets the dni of member to the given value 
     */
    public void setDni(String dni) {
        this.dni = dni;
    }
    /**
     * 
     * @return id of lata
     */
    public int getIdLata() {
        return idLata;
    }
    /**
     * 
     * @param idLata Sets the id of lata to the given value 
     */
    public void setIdLata(int idLata) {
        this.idLata = idLata;
    }
    /**
     * 
     * @return Day_reserved
     */
    public LocalDate getDia_reservado() {
        return dia_reservado;
    }
    /**
     * 
     * @param dia_reservado Sets the Day_reserved to the given valu
     */
    public void setDia_reservado(String dia_reservado) {
        this.dia_reservado = LocalDate.parse(dia_reservado);
    }
    /**
     * 
     * @return Reservation day
     */
    public LocalDate getDia_dereserva() {
        return dia_dereserva;
    }
    /**
     * 
     * @param dia_dereserva Sets the reservation day to the given valu
     */
    public void setDia_dereserva(String dia_dereserva) {
        this.dia_dereserva = LocalDate.parse(dia_dereserva);
    }

    @Override
    public String toString() {
        return "Reserve{" + "Dni=" + dni + ", dia_reservado=" + dia_reservado + ", idLata=" + idLata + ", dia_dereserva=" + dia_dereserva + '}';
    }

    

    
    
    
    
    
}

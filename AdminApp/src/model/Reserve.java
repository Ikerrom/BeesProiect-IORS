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
    private LocalDate reserveDate;
    private int idLata;
    private String reserveHour;

    public Reserve(Member m1, String reserveDate, int idLata, String reserveHour) {
        this.m1 = m1;
        this.reserveDate = LocalDate.parse(reserveDate);
        this.idLata = idLata;
        this.reserveHour = reserveHour;
    }

    public Member getM1() {
        return m1;
    }

    public void setM1(Member m1) {
        this.m1 = m1;
    }

    public LocalDate getReserveDate() {
        return reserveDate;
    }

    public void setReserveDate(LocalDate reserveDate) {
        this.reserveDate = reserveDate;
    }

    public int getIdLata() {
        return idLata;
    }

    public void setIdLata(int idLata) {
        this.idLata = idLata;
    }

    public String getReserveHour() {
        return reserveHour;
    }

    public void setReserveHour(String reserveHour) {
        this.reserveHour = reserveHour;
    }

    @Override
    public String toString() {
        return "Reserve{" + "m1=" + m1 + ", reserveDate=" + reserveDate + ", idLata=" + idLata + ", reserveHour=" + reserveHour + '}';
    }
    
    
    
    
    
}

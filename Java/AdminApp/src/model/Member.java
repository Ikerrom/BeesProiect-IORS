/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author arambarri.oihana
 */
public class Member {
    private String dni;
    private String name;
    private String surname;
    private String gmail;
    private String password;
    private boolean admin;
    private String moneyToPay;
    private String moneyInAccount;

    public Member(String dni, String name, String surname, String gmail, String password, boolean admin, String moneyToPay, String moneyInAccount) {
        this.dni = dni;
        this.name = name;
        this.surname = surname;
        this.gmail = gmail;
        this.password = password;
        this.admin = admin;
        this.moneyToPay = moneyToPay;
        this.moneyInAccount = moneyInAccount;
    }
    public Member(String dni,String password){
        this.dni = dni;
        this.password = password;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getGmail() {
        return gmail;
    }

    public void setGmail(String gmail) {
        this.gmail = gmail;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public boolean isAdmin() {
        return admin;
    }

    public void setAdmin(boolean admin) {
        this.admin = admin;
    }

    public String getMoneyToPay() {
        return moneyToPay;
    }

    public void setMoneyToPay(String moneyToPay) {
        this.moneyToPay = moneyToPay;
    }

    public String getMoneyInAccount() {
        return moneyInAccount;
    }

    public void setMoneyInAccount(String moneyInAccount) {
        this.moneyInAccount = moneyInAccount;
    }

    @Override
    public String toString() {
        return "Member{" + "dni=" + dni + ", name=" + name + ", surname=" + surname + ", gmail=" + gmail + ", password=" + password + ", admin=" + admin + ", moneyToPay=" + moneyToPay + ", moneyInAccount=" + moneyInAccount + '}';
    }
    
    
}

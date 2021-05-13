/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import ejecutes.AdminMenu;
import ejecutes.AdminMenu;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import javax.swing.JOptionPane;
import model.Buys;
import model.Member;
import model.Reserve;

import static model.Model.connect;

/**
 *Taulak eta eremuak errepasatu
 * @author arambarri.oihana
 */
public class Model {
    public static Connection connect() {
        Connection conn = null;
        try {
            String url = "jdbc:mariadb://localhost/bees_project";
            String user="root"; 
            String password="";
            conn = DriverManager.getConnection(url,user,password); 
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        } 
        
        return conn;
    }
    public static void login(String user, String pass){
        String sql="SELECT dni, contraseña FROM personas WHERE dni= '"+user+"' AND contraseña= '"+pass+"'";
        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql);
                ResultSet rs = pstmt.executeQuery()) {
            if (rs.next()) {
                user = rs.getString("dni");
                pass=rs.getString("contraseña");
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
            }else{
                JOptionPane.showMessageDialog(null, "Data wrong");            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
    }  
    public static ArrayList<Member> read() {
        ArrayList<Member> members = new ArrayList<>();
        String taula = "personas";
        String sql = "SELECT * FROM " + taula;

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Member m= new Member(rs.getString("dni"),rs.getString("nombre"),rs.getString("apellido"),rs.getString("gmail"),rs.getString("contraseña"),rs.getBoolean("admin"),rs.getString("dinero_pagar"),rs.getString("dinero_cuenta"),rs.getString("foto"));
                members.add(m);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return members;
    }
    public static int addMember(Member m){
        String sql = "INSERT INTO personas(dni,nombre,apellido,gmail,contraseña,admin,dinero_pagar,dinero_cuenta,foto) VALUES(?,?,?,?,?,?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setString(1,m.getDni());
            ptmt.setString(2,m.getName());
            ptmt.setString(3,m.getSurname());
            ptmt.setString(4,m.getGmail());
            ptmt.setString(5,m.getPassword());
            ptmt.setBoolean(6,m.isAdmin());
            ptmt.setString(7,m.getMoneyToPay());
            ptmt.setString(8,m.getMoneyInAccount());
            ptmt.setString(9,m.getPhoto());
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }
    public static void deleteMember(Member m) {
        String sql = "DELETE FROM personas WHERE dni = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, m.getDni());
            pstmt.executeUpdate(); 

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public static  void updateMember(Member m) {
        String sql = "UPDATE personas SET nombre = ? ,"
                + "apellido = ? ,"
                + "gmail = ?,"
                + "contraseña= ? ,"
                + "admin= ?,"
                + "dinero_pagar = ? ,"
                + "dinero_cuenta = ?, "
                + "foto = ?"
                + "WHERE dni = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1,m.getName());
            pstmt.setString(2,m.getSurname());
            pstmt.setString(3, m.getGmail());
            pstmt.setString(4, m.getPassword());
            pstmt.setBoolean(5, m.isAdmin());
            pstmt.setString(6, m.getMoneyToPay());
            pstmt.setString(7, m.getMoneyInAccount());
            pstmt.setString(8, m.getPhoto());
            pstmt.setString(9, m.getDni());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public static ArrayList<Reserve> readReserve() {
        ArrayList<Reserve> reserves = new ArrayList<>();

        String sql = "SELECT personas.dni, reservas.dia_reservado,latas.lata_id, reservas.dia_dereserva FROM ((reservas INNER JOIN personas ON reservas.dni = personas.dni),INNER JOIN latas ON reservas.lata_id = latas.lata_id)";

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
//                Reserve r= new Reserve(rs.getString("dni"),rs.getString("dia_reservado"),rs.getInt("id_lata"),rs.getString("dia_dereserva"));
//                reserves.add(r);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return reserves;
    }
    public static int addReserve(Reserve r){
        String sql = "INSERT INTO reservas(dni,dia_reservado,id_lata,dia_dereserva) VALUES(?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setObject(1,r.getDni());
            ptmt.setInt(3,r.getIdLata());
//            ptmt.setString(2,LocalDate.parse(r.getReserveDate()));
//            ptmt.setString(4,r.getReserveDate2());
   
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }
    public static void deleteReserve(Reserve r) {
        String sql = "DELETE FROM reserves WHERE dia_reservado = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setObject(1, r.getDia_reservado());
            pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public static  void updateReserve(Reserve r) {
        String sql = "UPDATE reservas SET lata_id = ? ,"
                + "dia_reservado = ? ,"
                + "dia_reserva = ?"
                + "WHERE dni = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1,r.getIdLata());
//            pstmt.setString(2,r.getReserveDate());
//            pstmt.setString(3, r.getReserveDate2());
            pstmt.setObject(4, r.getDni());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public static ArrayList<Buys> readBuys() {
        ArrayList<Buys> buys = new ArrayList<>();
        String taula = "compras";
        String sql = "SELECT * FROM " + taula;

        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Buys b= new Buys(rs.getInt("numeroCompra"),rs.getInt("id_producto"),rs.getString("precio"),rs.getInt("cantidad"));
                buys.add(b);
            }
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        return buys;
    }
    public static int addBuys(Buys b){
        String sql = "INSERT INTO compras(numeroCompra,id_producto,precio,cantidad) VALUES(?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setInt(1,b.getNumberBuy());
            ptmt.setInt(2,b.getId_product());
            ptmt.setString(3,b.getPrice());
            ptmt.setInt(4,b.getAmount());
   
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }
    public static void deleteBuys(Buys b) {
        String sql = "DELETE FROM compras WHERE numeroCompra = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, b.getNumberBuy());
            pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public static void updateBuys(Buys b) {
        String sql = "UPDATE compras SET id_producto= ?, precio=?, cantidad=? WHERE numeroCompra=?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, b.getId_product());
            pstmt.setString(2, b.getPrice());
            pstmt.setInt(3, b.getAmount());
            pstmt.setInt(4, b.getNumberBuy());
            
            pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
}
